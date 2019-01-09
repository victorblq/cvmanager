import { AbstractEntity } from './abstract-entity';

export class ProfessionalExperience extends AbstractEntity{
    title: string;
    role: string;
    description: string;
    company: string;
    period: string;
}