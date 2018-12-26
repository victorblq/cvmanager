import { Component, OnInit } from '@angular/core';
import { PersonalInfo } from '../../entity/personal-info';
import { Phone } from '../../entity/phone';
import { Email } from '../../entity/email';
import { Reference } from '../../entity/reference';

@Component({
    selector: 'personal-info',
    templateUrl: 'personal-info.component.html'
})

export class PersonalInfoComponent implements OnInit {

    private imagePath: string;

    private personalInfo: PersonalInfo = new PersonalInfo();

    constructor(
    ) { }

    ngOnInit() { 
    }

    previewImage(event){
        this.imagePath = event.target.value;
    }

    /**
     * Phone
     */
    addPhone(){
        if(this.personalInfo.phones == null){
            this.personalInfo.phones = new Array<Phone>();
        }

        this.personalInfo.phones.push(new Phone());
    }

    removePhone(phone){
        this.personalInfo.phones.splice(this.personalInfo.phones.indexOf(phone), 1);
    }

    /**
     * Email
     */
    addEmail(){
        if(this.personalInfo.emails == null){
            this.personalInfo.emails = new Array<Email>();
        }

        this.personalInfo.emails.push(new Email());
    }

    removeEmail(email){
        this.personalInfo.emails.splice(this.personalInfo.emails.indexOf(email), 1);
    }

    /**
     * References
     */
    addReference(){
        if(this.personalInfo.references == null){
            this.personalInfo.references = new Array<Reference>();
        }

        this.personalInfo.references.push(new Reference());
    }

    removeReference(reference){
        this.personalInfo.references.splice(this.personalInfo.references.indexOf(reference), 1);
    }
}