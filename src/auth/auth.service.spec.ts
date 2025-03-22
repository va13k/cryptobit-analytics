import { Test, TestingModule } from '@nestjs/testing';
import { AuthService } from './auth.service';
import { AdminsService } from '../admins/admins.service';
import { JwtService } from '@nestjs/jwt';
import * as bcrypt from 'bcrypt';

const mockAdminsService = {
  create: jest.fn(),
  findByEmail: jest.fn(),
};

const mockJwtService = {
  sign: jest.fn().mockReturnValue('mocked-jwt-token'),
};

describe('AuthService', () => {
  let service: AuthService;

  beforeEach(async () => {
    const module: TestingModule = await Test.createTestingModule({
      providers: [
        AuthService,
        { provide: AdminsService, useValue: mockAdminsService },
        { provide: JwtService, useValue: mockJwtService },
      ],
    }).compile();

    service = module.get<AuthService>(AuthService);
    jest.clearAllMocks();
  });

  it('should be defined', () => {
    expect(service).toBeDefined();
  });

  describe('signup', () => {
    it('should hash password, create admin and return token', async () => {
      const dto = {
        name: 'Admin',
        email: 'admin@example.com',
        password: 'password123',
      };
      const createdAdmin = {
        _id: 'adminId',
        email: dto.email,
        name: dto.name,
        role: 'admin',
      };
      mockAdminsService.create.mockResolvedValue(createdAdmin);

      const result = await service.signup(dto);

      expect(mockAdminsService.create).toHaveBeenCalledWith(
        expect.objectContaining({
          email: dto.email,
          name: dto.name,
          passwordHash: expect.any(String) as unknown as string,
        }),
      );
      expect(mockJwtService.sign).toHaveBeenCalledWith({
        sub: 'adminId',
        email: dto.email,
        role: 'admin',
      });
      expect(result).toEqual({ accessToken: 'mocked-jwt-token' });
    });
  });

  describe('validateAdmin', () => {
    it('should return admin if credentials are valid', async () => {
      const mockAdmin = {
        _id: 'adminId',
        email: 'admin@example.com',
        passwordHash: await bcrypt.hash('password123', 10),
        role: 'admin',
      };
      mockAdminsService.findByEmail.mockResolvedValue(mockAdmin);

      const result = await service.validateAdmin(
        mockAdmin.email,
        'password123',
      );
      expect(result).toEqual(mockAdmin);
    });

    it('should throw if email not found', async () => {
      mockAdminsService.findByEmail.mockResolvedValue(null);
      await expect(
        service.validateAdmin('fake@mail.com', 'pass'),
      ).rejects.toThrow('Invalid email or password');
    });

    it('should throw if password is wrong', async () => {
      const mockAdmin = {
        email: 'admin@example.com',
        passwordHash: await bcrypt.hash('correctpass', 10),
      };
      mockAdminsService.findByEmail.mockResolvedValue(mockAdmin);

      await expect(
        service.validateAdmin(mockAdmin.email, 'wrongpass'),
      ).rejects.toThrow('Invalid email or password');
    });
  });

  describe('login', () => {
    it('should return token if login is successful', async () => {
      const loginDto = {
        email: 'admin@example.com',
        password: 'password123',
      };
      const mockAdmin = {
        _id: 'adminId',
        email: loginDto.email,
        passwordHash: await bcrypt.hash(loginDto.password, 10),
        role: 'admin',
      };
      mockAdminsService.findByEmail.mockResolvedValue(mockAdmin);

      const result = await service.login(loginDto);
      expect(result).toEqual({ accessToken: 'mocked-jwt-token' });
    });

    it('should throw if credentials are invalid', async () => {
      mockAdminsService.findByEmail.mockResolvedValue(null);
      await expect(
        service.login({ email: 'x', password: 'y' }),
      ).rejects.toThrow('Invalid email or password');
    });
  });
});
