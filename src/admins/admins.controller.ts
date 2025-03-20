import {
  Body,
  Controller,
  Delete,
  Get,
  Param,
  Patch,
  Post,
  ValidationPipe,
} from '@nestjs/common';
import { AdminsService } from './admins.service';
import { CreateAdminDto } from './dto/create-admin.dto';
import { UpdateAdminDto } from './dto/update-admin.dto';
import { Admin } from './schemas/admin.schema';

@Controller('admins')
export class AdminsController {
  constructor(private readonly adminsService: AdminsService) {}

  @Get()
  async findAll(): Promise<Admin[]> {
    return this.adminsService.findAll();
  }

  @Get(':id')
  async findOne(@Param('id') id: string): Promise<Admin> {
    return this.adminsService.findOne(id);
  }

  @Post()
  async create(
    @Body(new ValidationPipe({ whitelist: true }))
    createAdminDto: CreateAdminDto,
  ): Promise<Admin> {
    return this.adminsService.create(createAdminDto);
  }

  @Patch(':id')
  async update(
    @Param('id') id: string,
    @Body(new ValidationPipe({ whitelist: true }))
    updateAdminDto: UpdateAdminDto,
  ): Promise<Admin> {
    return this.adminsService.update(id, updateAdminDto);
  }

  @Delete(':id')
  async remove(@Param('id') id: string): Promise<Admin> {
    return this.adminsService.remove(id);
  }
}
