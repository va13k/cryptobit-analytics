import { Test, TestingModule } from '@nestjs/testing';
import { AdminsController } from './admins.controller';
import { AdminsService } from './admins.service';
import { CreateAdminDto } from './dto/create-admin.dto';
import { UpdateAdminDto } from './dto/update-admin.dto';
import { NotFoundException } from '@nestjs/common';

describe('AdminsController', () => {
  let controller: AdminsController;

  const mockAdminService = {
    findAll: jest
      .fn()
      .mockResolvedValue([
        { name: 'TestAdmin1', email: 'testadmin1@mail.com' },
      ]),
    findOne: jest.fn().mockResolvedValue({
      name: 'TestAdmin1',
      email: 'testadmin1@mail.com',
    }),
    create: jest.fn().mockImplementation((dto: CreateAdminDto) => ({
      ...dto,
      _id: 'mockedId',
    })),
    update: jest
      .fn()
      .mockImplementation((id: string, dto: UpdateAdminDto) =>
        Promise.resolve({ _id: 'mockedId', ...dto }),
      ),
    remove: jest.fn().mockResolvedValue({
      _id: 'mockedId',
      name: 'DeletedAdmin',
      email: 'deletedadmin@mail.com',
    }),
  };

  beforeEach(async () => {
    const module: TestingModule = await Test.createTestingModule({
      controllers: [AdminsController],
      providers: [
        {
          provide: AdminsService,
          useValue: mockAdminService,
        },
      ],
    }).compile();

    controller = module.get<AdminsController>(AdminsController);
  });

  it('should be defined', () => {
    expect(controller).toBeDefined();
  });

  it('should return array of admins', async () => {
    const result = await controller.findAll();
    expect(result).toEqual([
      { name: 'TestAdmin1', email: 'testadmin1@mail.com' },
    ]);
    expect(mockAdminService.findAll).toHaveBeenCalled();
  });

  it('should return an admin', async () => {
    const result = await controller.findOne('mockedId');
    expect(result).toEqual({
      name: 'TestAdmin1',
      email: 'testadmin1@mail.com',
    });
    expect(mockAdminService.findOne).toHaveBeenCalledWith('mockedId');
  });

  it('should create an admin', async () => {
    const dto: CreateAdminDto = {
      name: 'TestAdmin1',
      email: 'testadmin1@mail.com',
      password: 'password',
    };
    const result = await controller.create(dto);
    expect(result).toEqual({
      ...dto,
      _id: 'mockedId',
    });
    expect(mockAdminService.create).toHaveBeenCalledWith(dto);
  });

  it('should update an admin', async () => {
    const dto: UpdateAdminDto = {
      name: 'UpdatedAdmin',
      email: 'updatedadmin@mail.com',
    };
    const result = await controller.update('mockedId', dto);
    expect(result).toEqual({
      _id: 'mockedId',
      ...dto,
    });
    expect(mockAdminService.update).toHaveBeenCalledWith('mockedId', dto);
  });

  it('should delete an admin', async () => {
    const result = await controller.remove('mockedId');
    expect(result).toEqual({
      _id: 'mockedId',
      name: 'DeletedAdmin',
      email: 'deletedadmin@mail.com',
    });
    expect(mockAdminService.remove).toHaveBeenCalledWith('mockedId');
  });

  it('should throw if admin not found', async () => {
    mockAdminService.findOne.mockRejectedValueOnce(new NotFoundException());
    await expect(controller.findOne('nonexistent-id')).rejects.toThrow(
      NotFoundException,
    );
  });
});
