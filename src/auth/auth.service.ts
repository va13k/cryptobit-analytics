import { Injectable, UnauthorizedException } from '@nestjs/common';
import { Admin } from 'src/admins/schemas/admin.schema';
import { AdminsService } from '../admins/admins.service';
import { JwtService } from '@nestjs/jwt';
import * as bcrypt from 'bcrypt';
import { LoginDto } from './dto/login.dto';
import { SignupDto } from './dto/signup.dto';
import { CreateAdminDto } from 'src/admins/dto/create-admin.dto';

@Injectable()
export class AuthService {
  constructor(
    private readonly adminsService: AdminsService,
    private readonly jwtService: JwtService,
  ) {}

  private generateToken(admin: Admin): { accessToken: string } {
    const payload = {
      sub: admin._id,
      email: admin.email,
      role: admin.role || 'admin',
    };
    return {
      accessToken: this.jwtService.sign(payload),
    };
  }

  async signup(dto: SignupDto) {
    const hashed = await bcrypt.hash(dto.password, 10);
    const createAdminDto: CreateAdminDto = {
      name: dto.name,
      email: dto.email,
      passwordHash: hashed,
    };
    const createdAdmin = await this.adminsService.create(createAdminDto);
    return this.generateToken(createdAdmin);
  }

  async validateAdmin(email: string, password: string): Promise<Admin> {
    const admin = await this.adminsService.findByEmail(email);
    if (!admin || !(await bcrypt.compare(password, admin.passwordHash))) {
      throw new UnauthorizedException('Invalid email or password');
    }
    return admin;
  }

  async login(loginDto: LoginDto): Promise<{ accessToken: string }> {
    const { email, password } = loginDto;
    const admin = await this.adminsService.findByEmail(email);
    if (!admin || !(await bcrypt.compare(password, admin.passwordHash))) {
      throw new UnauthorizedException('Invalid email or password');
    }
    return this.generateToken(admin);
  }
}
