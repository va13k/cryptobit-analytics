import { Test, TestingModule } from '@nestjs/testing';
import { ArticlesService } from './articles.service';
import { getModelToken } from '@nestjs/mongoose';
import { Article } from './schemas/article.schema';
import { CreateArticleDto } from './dto/create-article.dto';

describe('ArticlesService', () => {
  let service: ArticlesService;

  const mockArticleConsturctor = jest
    .fn()
    .mockImplementation((dto: CreateArticleDto) => ({
      ...dto,
      save: jest.fn().mockResolvedValue({ _id: 'mockedId', ...dto }),
    }));

  const mockArticleModel = Object.assign(mockArticleConsturctor, {
    find: jest.fn().mockReturnValue({
      exec: jest.fn().mockResolvedValue([
        {
          title: 'Test Article',
          content: 'Test Content',
          imageUrl: 'images/articles/test.jpg',
          status: 'draft',
          tags: ['test'],
        },
      ]),
    }),
    findById: jest.fn().mockReturnValue({
      exec: jest.fn().mockResolvedValue({
        title: 'Test Article',
        content: 'Test Content',
        imageUrl: 'images/articles/test.jpg',
        status: 'draft',
        tags: ['test'],
      }),
    }),
    create: jest.fn().mockResolvedValue({
      exec: jest.fn().mockReturnValue({
        title: 'Test Article',
        content: 'Test Content',
        imageUrl: 'images/articles/test.jpg',
        status: 'draft',
        tags: ['test'],
      }),
    }),
    findByIdAndUpdate: jest.fn().mockReturnValue({
      exec: jest.fn().mockResolvedValue({
        title: 'Updated Article',
        content: 'Updated Content',
        imageUrl: 'images/articles/test.jpg',
        status: 'draft',
        tags: ['test'],
      }),
    }),
    findByIdAndDelete: jest.fn().mockReturnValue({
      exec: jest.fn().mockResolvedValue({
        title: 'Deleted Article',
        content: 'Deleted Content',
        imageUrl: 'images/articles/test.jpg',
        status: 'draft',
        tags: ['test'],
      }),
    }),
  });

  beforeEach(async () => {
    const module: TestingModule = await Test.createTestingModule({
      providers: [
        ArticlesService,
        {
          provide: getModelToken(Article.name),
          useValue: mockArticleModel,
        },
      ],
    }).compile();

    service = module.get<ArticlesService>(ArticlesService);
  });

  it('should be defined', () => {
    expect(service).toBeDefined();
  });

  it('should find all articles', async () => {
    const articles = await service.findAll();
    expect(articles).toEqual([
      {
        title: 'Test Article',
        content: 'Test Content',
        imageUrl: 'images/articles/test.jpg',
        status: 'draft',
        tags: ['test'],
      },
    ]);
  });

  it('should find an article', async () => {
    const article = await service.findOne('mockedId');
    expect(article).toEqual({
      title: 'Test Article',
      content: 'Test Content',
      imageUrl: 'images/articles/test.jpg',
      status: 'draft',
      tags: ['test'],
    });
  });

  it('should create an article', async () => {
    const article = await service.create({
      title: 'Test Article',
      content: 'Test Content',
      imageUrl: 'images/articles/test.jpg',
      status: 'draft',
      tags: ['test'],
    });
    expect(article).toEqual({
      _id: 'mockedId',
      title: 'Test Article',
      content: 'Test Content',
      imageUrl: 'images/articles/test.jpg',
      status: 'draft',
      tags: ['test'],
    });
  });

  it('should update an article', async () => {
    const article = await service.update('mockedId', {
      title: 'Updated Article',
      content: 'Updated Content',
      imageUrl: 'images/articles/test.jpg',
      status: 'draft',
      tags: ['test'],
    });
    expect(article).toEqual({
      title: 'Updated Article',
      content: 'Updated Content',
      imageUrl: 'images/articles/test.jpg',
      status: 'draft',
      tags: ['test'],
    });
  });

  it('should delete an article', async () => {
    const article = await service.remove('mockedId');
    expect(article).toEqual({
      title: 'Deleted Article',
      content: 'Deleted Content',
      imageUrl: 'images/articles/test.jpg',
      status: 'draft',
      tags: ['test'],
    });
  });
});
