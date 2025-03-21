import { Test, TestingModule } from '@nestjs/testing';
import { AdminsService } from './admins.service';
import { getModelToken } from '@nestjs/mongoose';
import { Admin } from './schemas/admin.schema';
import { CreateAdminDto } from './dto/create-admin.dto';

describe('AdminsService', () => {
  let service: AdminsService;

  const mockAdminConstructor = jest
    .fn()
    .mockImplementation((dto: CreateAdminDto) => ({
      ...dto,
      save: jest.fn().mockResolvedValue({ _id: 'mockedId', ...dto }),
    }));

  const mockAdminModel = Object.assign(mockAdminConstructor, {
    find: jest.fn().mockReturnValue({
      exec: jest
        .fn()
        .mockResolvedValue([
          { name: 'TestAdmin1', email: 'testadmin1@mail.com' },
        ]),
    }),
    findById: jest.fn().mockReturnValue({
      exec: jest.fn().mockResolvedValue({
        name: 'TestAdmin1',
        email: 'testadmin1@mail.com',
      }),
    }),
    create: jest.fn().mockImplementation((dto: CreateAdminDto) => ({
      ...dto,
      save: jest.fn().mockResolvedValue({ _id: 'mockedId', ...dto }),
    })),
    findByIdAndUpdate: jest.fn().mockReturnValue({
      exec: jest.fn().mockResolvedValue({
        name: 'UpdatedAdmin',
        email: 'updatedadmin@mail.com',
      }),
    }),
    findByIdAndDelete: jest.fn().mockReturnValue({
      exec: jest.fn().mockResolvedValue({
        name: 'DeletedAdmin',
        email: 'deletedadmin@mail.com',
      }),
    }),
  });

  beforeEach(async () => {
    const module: TestingModule = await Test.createTestingModule({
      providers: [
        AdminsService,
        {
          provide: getModelToken(Admin.name),
          useValue: mockAdminModel,
        },
      ],
    }).compile();

    service = module.get<AdminsService>(AdminsService);
  });

  it('should be defined', () => {
    expect(service).toBeDefined();
  });

  it('should return array of admins', async () => {
    const result = await service.findAll();
    expect(result).toEqual([
      { name: 'TestAdmin1', email: 'testadmin1@mail.com' },
    ]);
  });

  it('should return an admin', async () => {
    const result = await service.findOne('mockedId');
    expect(result).toEqual({
      name: 'TestAdmin1',
      email: 'testadmin1@mail.com',
    });
  });

  it('should create an admin', async () => {
    const adminData = { name: 'Admin02', email: 'admin02@mail.com' };
    const result = await service.create(adminData as Admin);
    expect(result).toEqual({ _id: 'mockedId', ...adminData });
  });

  it('should update an admin', async () => {
    const adminData = { name: 'UpdatedAdmin', email: 'updatedadmin@mail.com' };
    const result = await service.update('mockedId', adminData as Admin);
    expect(result).toEqual(adminData);
  });

  it('should delete an admin', async () => {
    const result = await service.remove('mockedId');
    expect(result).toEqual({
      name: 'DeletedAdmin',
      email: 'deletedadmin@mail.com',
    });
  });
});
