import { Test, TestingModule } from '@nestjs/testing';
import { ServicesService } from './services.service';
import { getModelToken } from '@nestjs/mongoose';
import { CreateServiceDto } from './dto/create-service.dto';
import { Service } from './schemas/service.schema';

describe('ServicesService', () => {
  let service: ServicesService;

  const mockServiceConstructor = jest
    .fn()
    .mockImplementation((dto: CreateServiceDto) => ({
      ...dto,
      save: jest.fn().mockResolvedValue({ id: 'mockedId', ...dto }),
    }));

  const mockServiceModel = Object.assign(mockServiceConstructor, {
    find: jest.fn().mockReturnValue({
      exec: jest.fn().mockResolvedValue([
        {
          title: 'TestService1',
          content: 'Test service',
          imageUrl: 'https://test.com/image.jpg',
          categories: ['test', 'service'],
        },
      ]),
    }),
    findById: jest.fn().mockReturnValue({
      exec: jest.fn().mockResolvedValue({
        title: 'TestService1',
        content: 'Test service',
        imageUrl: 'https://test.com/image.jpg',
        categories: ['test', 'service'],
      }),
    }),
    create: jest.fn().mockImplementation((dto: CreateServiceDto) => ({
      ...dto,
      save: jest.fn().mockResolvedValue({ id: 'mockedId', ...dto }),
    })),
    findByIdAndUpdate: jest.fn().mockReturnValue({
      exec: jest.fn().mockResolvedValue({
        title: 'UpdatedService',
        content: 'Updated service',
        imageUrl: 'https://test.com/image.jpg',
        categories: ['test', 'service'],
      }),
    }),
    findByIdAndDelete: jest.fn().mockReturnValue({
      exec: jest.fn().mockResolvedValue({
        title: 'DeletedService',
        content: 'Deleted service',
        imageUrl: 'https://test.com/image.jpg',
        categories: ['test', 'service'],
      }),
    }),
  });

  beforeEach(async () => {
    const module: TestingModule = await Test.createTestingModule({
      providers: [
        ServicesService,
        {
          provide: getModelToken(Service.name),
          useValue: mockServiceModel,
        },
      ],
    }).compile();

    service = module.get<ServicesService>(ServicesService);
  });

  it('should be defined', () => {
    expect(service).toBeDefined();
  });

  it('should return array of services', async () => {
    const result = await service.findAll();
    expect(result).toEqual([
      {
        title: 'TestService1',
        content: 'Test service',
        imageUrl: 'https://test.com/image.jpg',
        categories: ['test', 'service'],
      },
    ]);
  });

  it('should return a service', async () => {
    const result = await service.findOne('mockedId');
    expect(result).toEqual({
      title: 'TestService1',
      content: 'Test service',
      imageUrl: 'https://test.com/image.jpg',
      categories: ['test', 'service'],
    });
  });

  it('should create a service', async () => {
    const dto: CreateServiceDto = {
      title: 'TestService1',
      content: 'Test service 1',
      imageUrl: 'https://test.com/image.jpg',
      categories: ['test', 'service'],
    };
    const result = await service.create(dto);
    expect(result).toEqual({ id: 'mockedId', ...dto });
  });

  it('should update a service', async () => {
    const dto: CreateServiceDto = {
      title: 'UpdatedService',
      content: 'Updated service',
      imageUrl: 'https://test.com/image.jpg',
      categories: ['test', 'service'],
    };
    const result = await service.update('mockedId', dto);
    expect(result).toEqual({
      title: 'UpdatedService',
      content: 'Updated service',
      imageUrl: 'https://test.com/image.jpg',
      categories: ['test', 'service'],
    });
  });

  it('should delete a service', async () => {
    const result = await service.remove('mockedId');
    expect(result).toEqual({
      title: 'DeletedService',
      content: 'Deleted service',
      imageUrl: 'https://test.com/image.jpg',
      categories: ['test', 'service'],
    });
  });
});
