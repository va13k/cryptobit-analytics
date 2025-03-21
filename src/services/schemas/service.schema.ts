import { Schema, Prop, SchemaFactory } from '@nestjs/mongoose';
import { Document } from 'mongoose';

@Schema({ timestamps: true, versionKey: false })
export class Service extends Document {
  @Prop({ required: true })
  title: string;

  @Prop({ required: true })
  content: string;

  @Prop()
  imageUrl?: string;

  @Prop()
  categories: string[];
}

export const ServiceSchema = SchemaFactory.createForClass(Service);
