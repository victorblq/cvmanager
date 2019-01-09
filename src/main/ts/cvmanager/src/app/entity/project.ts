import { AbstractEntity } from './abstract-entity';

export class Project extends AbstractEntity{
    title: string;
    description: string;
    link: string;
    image: string;
    startDate: string;
    endDate: string;
}