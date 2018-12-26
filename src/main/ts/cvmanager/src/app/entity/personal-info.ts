import { Phone } from './phone';
import { AbstractEntity } from './abstract-entity';
import { Email } from './email';
import { Reference } from './reference';

export class PersonalInfo extends AbstractEntity{
    image: string;
    title: string;
    subtitle: string;
    firstName: string;
    lastName: string;
    aboutMe: string;
    phones: Array<Phone>;
    emails: Array<Email>;
    references: Array<Reference>
}