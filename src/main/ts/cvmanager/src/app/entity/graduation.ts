import { AbstractEntity } from './abstract-entity';

export class Graduation extends AbstractEntity{
    course: string;
    institute: string;
    title: string;
    status: string;
    period: string;
}