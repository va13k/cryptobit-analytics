import { Test, TestingModule } from '@nestjs/testing';
import { ServicesController } from './services.controller';
import { ServicesService } from './services.service';
import { UpdateServiceDto } from './dto/update-service.dto';
import { CreateServiceDto } from './dto/create-service.dto';

describe('ServicesController', () => {
  let controller: ServicesController;

  const mockServicesService = {
    findAll: jest.fn().mockResolvedValue([
      {
        title: 'TestService1',
        description: 'Test service',
      },
    ]),
    findOne: jest.fn().mockResolvedValue({
      title: 'TestService1',
      description: 'Test service',
    }),
    create: jest.fn().mockImplementation((dto: CreateServiceDto) => ({
      ...dto,
      _id: 'mockedId',
    })),
    update: jest.fn().mockImplementation((id, dto: UpdateServiceDto) => ({
      _id: 'mockedId',
      ...dto,
    })),
    remove: jest.fn().mockResolvedValue({
      _id: 'mockedId',
      title: 'DeletedService',
      description: 'Deleted service',
    }),
  };

  beforeEach(async () => {
    const module: TestingModule = await Test.createTestingModule({
      controllers: [ServicesController],
      providers: [
        {
          provide: ServicesService,
          useValue: mockServicesService,
        },
      ],
    }).compile();

    controller = module.get<ServicesController>(ServicesController);
  });

  it('should be defined', () => {
    expect(controller).toBeDefined();
  });

  it('should return array of services', async () => {
    const result = await controller.findAll();
    expect(result).toEqual([
      {
        title: 'TestService1',
        description: 'Test service',
      },
    ]);
    expect(mockServicesService.findAll).toHaveBeenCalled();
  });

  it('should return a service', async () => {
    const result = await controller.findOne('mockedId');
    expect(result).toEqual({
      title: 'TestService1',
      description: 'Test service',
    });
    expect(mockServicesService.findOne).toHaveBeenCalled();
  });

  it('should create a service', async () => {
    const dto: CreateServiceDto = {
      title: 'TestService1',
      content: 'Test service',
      categories: ['test', 'service'],
    };
    const result = await controller.create(dto);
    expect(result).toEqual({
      ...dto,
      _id: 'mockedId',
    });
    expect(mockServicesService.create).toHaveBeenCalledWith(dto);
  });

  it('should update a service', async () => {
    const dto: UpdateServiceDto = {
      title: 'UpdatedService',
      content: 'Updated service',
    };
    const result = await controller.update('mockedId', dto);
    expect(result).toEqual({
      _id: 'mockedId',
      ...dto,
    });
    expect(mockServicesService.update).toHaveBeenCalledWith('mockedId', dto);
  });

  it('should delete a service', async () => {
    const result = await controller.remove('mockedId');
    expect(result).toEqual({
      _id: 'mockedId',
      title: 'DeletedService',
      description: 'Deleted service',
    });
    expect(mockServicesService.remove).toHaveBeenCalledWith('mockedId');
  });
});
