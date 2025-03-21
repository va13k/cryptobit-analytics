import {
  IsArray,
  IsNotEmpty,
  IsOptional,
  IsString,
  IsIn,
} from 'class-validator';

export class CreateArticleDto {
  @IsNotEmpty()
  @IsString()
  title: string;

  @IsNotEmpty()
  @IsString()
  content: string;

  @IsOptional()
  @IsString()
  imageUrl?: string;

  @IsOptional()
  @IsIn(['draft', 'published', 'archived'])
  status?: string;

  @IsOptional()
  @IsArray()
  @IsString({ each: true })
  tags?: string[];
}
