import { Schema, Prop, SchemaFactory } from '@nestjs/mongoose';
import { Document } from 'mongoose';

@Schema({ timestamps: true, versionKey: false })
export class Article extends Document {
  @Prop({ required: true })
  title: string;

  @Prop({ required: true })
  content: string;

  @Prop()
  imageUrl?: string;

  @Prop({
    required: false,
    default: 'draft',
    enum: ['draft', 'published', 'archived'],
  })
  status: string;

  @Prop({ type: [String], default: () => [] })
  tags: string[];
}

export const ArticleSchema = SchemaFactory.createForClass(Article);
