import { Test, TestingModule } from '@nestjs/testing';
import { ArticlesController } from './articles.controller';
import { CreateArticleDto } from './dto/create-article.dto';
import { UpdateArticleDto } from './dto/update-article.dto';
import { NotFoundException } from '@nestjs/common';
import { ArticlesService } from './articles.service';

describe('ArticlesController', () => {
  let controller: ArticlesController;

  const mockArticleService = {
    findAll: jest.fn().mockResolvedValue([
      {
        title: 'Test Article',
        content: 'Test Content',
        imageUrl: 'images/articles/test.jpg',
        status: 'draft',
        tags: ['test'],
      },
    ]),
    findOne: jest.fn().mockResolvedValue({
      title: 'Test Article',
      content: 'Test Content',
      imageUrl: 'images/articles/test.jpg',
      status: 'draft',
      tags: ['test'],
    }),
    create: jest.fn().mockImplementation((dto: CreateArticleDto) => ({
      ...dto,
      _id: 'mockedId',
    })),
    update: jest
      .fn()
      .mockImplementation((id: string, dto: UpdateArticleDto) =>
        Promise.resolve({ _id: 'mockedId', ...dto }),
      ),
    remove: jest.fn().mockResolvedValue({
      _id: 'mockedId',
      title: 'Deleted Article',
      content: 'Deleted Content',
      imageUrl: 'images/articles/test.jpg',
      status: 'draft',
      tags: ['test'],
    }),
  };

  beforeEach(async () => {
    const module: TestingModule = await Test.createTestingModule({
      controllers: [ArticlesController],
      providers: [
        {
          provide: ArticlesService,
          useValue: mockArticleService,
        },
      ],
    }).compile();

    controller = module.get<ArticlesController>(ArticlesController);
  });

  it('should be defined', () => {
    expect(controller).toBeDefined();
  });

  it('should return array of articles', async () => {
    const result = await controller.findAll();
    expect(result).toEqual([
      {
        title: 'Test Article',
        content: 'Test Content',
        imageUrl: 'images/articles/test.jpg',
        status: 'draft',
        tags: ['test'],
      },
    ]);
    expect(mockArticleService.findAll).toHaveBeenCalled();
  });

  it('should return an article', async () => {
    const result = await controller.findOne('mockedId');
    expect(result).toEqual({
      title: 'Test Article',
      content: 'Test Content',
      imageUrl: 'images/articles/test.jpg',
      status: 'draft',
      tags: ['test'],
    });
  });

  it('should create an article', async () => {
    const dto: CreateArticleDto = {
      title: 'Test Article',
      content: 'Test Content',
      imageUrl: 'images/articles/test.jpg',
      status: 'draft',
      tags: ['test'],
    };
    const result = await controller.create(dto);
    expect(result).toEqual({
      ...dto,
      _id: 'mockedId',
    });
    expect(mockArticleService.create).toHaveBeenCalledWith(dto);
  });

  it('should update an article', async () => {
    const dto: UpdateArticleDto = {
      title: 'Updated Article',
      content: 'Updated Content',
      imageUrl: 'images/articles/test.jpg',
      status: 'published',
      tags: ['updated'],
    };
    const result = await controller.update('mockedId', dto);
    expect(result).toEqual({
      _id: 'mockedId',
      ...dto,
    });
    expect(mockArticleService.update).toHaveBeenCalledWith('mockedId', dto);
  });

  it('should delete an article', async () => {
    const result = await controller.remove('mockedId');
    expect(result).toEqual({
      _id: 'mockedId',
      title: 'Deleted Article',
      content: 'Deleted Content',
      imageUrl: 'images/articles/test.jpg',
      status: 'draft',
      tags: ['test'],
    });
    expect(mockArticleService.remove).toHaveBeenCalledWith('mockedId');
  });

  it('should throw if article not found', async () => {
    mockArticleService.findOne.mockRejectedValueOnce(new NotFoundException());
    await expect(controller.findOne('nonexistent-id')).rejects.toThrow(
      NotFoundException,
    );
  });
});
