import { Test, TestingModule } from '@nestjs/testing';
import { AuthController } from './auth.controller';
import { AuthService } from './auth.service';
import { SignupDto } from './dto/signup.dto';
import { LoginDto } from './dto/login.dto';

describe('AuthController', () => {
  let controller: AuthController;

  const mockAuthService = {
    signup: jest.fn(),
    login: jest.fn(),
  };

  beforeEach(async () => {
    const module: TestingModule = await Test.createTestingModule({
      controllers: [AuthController],
      providers: [
        {
          provide: AuthService,
          useValue: mockAuthService,
        },
      ],
    }).compile();

    controller = module.get<AuthController>(AuthController);
    jest.clearAllMocks();
  });

  it('should be defined', () => {
    expect(controller).toBeDefined();
  });

  describe('signup()', () => {
    it('should call authService.signup() with SignupDto and return token', async () => {
      const signupDto: SignupDto = {
        name: 'AdminTest',
        email: 'admin@test.com',
        password: 'password123',
      };

      const mockResponse = { accessToken: 'mocked-jwt-token' };
      mockAuthService.signup.mockResolvedValue(mockResponse);

      const result = await controller.signup(signupDto);
      expect(mockAuthService.signup).toHaveBeenCalledWith(signupDto);
      expect(result).toEqual(mockResponse);
    });
  });

  describe('login()', () => {
    it('should call authService.login() with LoginDto and return token', async () => {
      const loginDto: LoginDto = {
        email: 'admin@test.com',
        password: 'password123',
      };

      const mockResponse = { accessToken: 'mocked-jwt-token' };
      mockAuthService.login.mockResolvedValue(mockResponse);

      const result = await controller.login(loginDto);
      expect(mockAuthService.login).toHaveBeenCalledWith(loginDto);
      expect(result).toEqual(mockResponse);
    });
  });
});
