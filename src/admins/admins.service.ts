import { Injectable, NotFoundException } from '@nestjs/common';
import { CreateAdminDto } from './dto/create-admin.dto';
import { UpdateAdminDto } from './dto/update-admin.dto';
import { Admin } from './schemas/admin.schema';
import { InjectModel } from '@nestjs/mongoose';
import { Model } from 'mongoose';

@Injectable()
export class AdminsService {
  constructor(
    @InjectModel(Admin.name) private readonly adminModel: Model<Admin>,
  ) {}

  async findAll(): Promise<Admin[]> {
    return this.adminModel.find().exec();
  }

  async findOne(id: string): Promise<Admin> {
    const admin = await this.adminModel.findById(id).exec();
    if (!admin) {
      throw new NotFoundException(`Admin with ID ${id} not found`);
    }
    return admin;
  }

  async create(createAdminDto: CreateAdminDto): Promise<Admin> {
    const newAdmin = new this.adminModel(createAdminDto);
    return newAdmin.save();
  }

  async update(id: string, updateAdminDto: UpdateAdminDto): Promise<Admin> {
    const updatedAdmin = await this.adminModel
      .findByIdAndUpdate(id, updateAdminDto, { new: true })
      .exec();

    if (!updatedAdmin) {
      throw new NotFoundException(`Admin with ID ${id} not found`);
    }

    return updatedAdmin;
  }

  async remove(id: string): Promise<Admin> {
    const deletedAdmin = await this.adminModel.findByIdAndDelete(id).exec();

    if (!deletedAdmin) {
      throw new NotFoundException(`Admin with ID ${id} not found`);
    }

    return deletedAdmin;
  }
}
