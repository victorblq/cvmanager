import { Component, OnInit, ViewChild } from '@angular/core';
import { PersonalInfo } from '../../entity/personal-info';
import { Phone } from '../../entity/phone';
import { Email } from '../../entity/email';
import { Reference } from '../../entity/reference';
import { PersonalInfoService } from '../../services/personal-info.service';
import { MatInput } from '@angular/material';

@Component({
    selector: 'personal-info',
    templateUrl: 'personal-info.component.html'
})
export class PersonalInfoComponent implements OnInit {

    private imagePath: string;
    @ViewChild("inputFile") inputFile: MatInput;

    private personalInfo: PersonalInfo = new PersonalInfo();

    constructor(
        private personalInfoService: PersonalInfoService
    ) { }

    ngOnInit() { 
        this.personalInfoService.getPersonalInfo()
        .then((result: PersonalInfo) => {
            this.personalInfo = result;
        })
    }

    updatePersonalInfo(){
        this.personalInfoService.updatePersonalInfo(this.personalInfo)
        .then((result: PersonalInfo) => {
            this.personalInfo = result;
        })
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

    savePhone(phone: Phone){
        this.personalInfoService.savePhone(phone)
        .then((result: PersonalInfo) => {
            this.personalInfo = result;
        })
    }

    removePhone(phone){
        if(phone.id != null){
            this.personalInfoService.removePhone(phone.id)
            .then((result) => {
                this.personalInfo.phones.splice(this.personalInfo.phones.indexOf(phone), 1);
                //Message    
            })
        }else{
            this.personalInfo.phones.splice(this.personalInfo.phones.indexOf(phone), 1);
        }
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

    saveEmail(email: Email){
        this.personalInfoService.saveEmail(email)
        .then((result: PersonalInfo) => {
            this.personalInfo = result;
        })
    }

    removeEmail(email){
        if(email.id != null){
            this.personalInfoService.removeEmail(email.id)
            .then((result) => {
                this.personalInfo.emails.splice(this.personalInfo.emails.indexOf(email), 1);
                //Message    
            })
        }else{
            this.personalInfo.emails.splice(this.personalInfo.emails.indexOf(email), 1);
        }
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

    saveReference(reference: Reference){
        this.personalInfoService.saveReference(reference)
        .then((result: PersonalInfo) => {
            this.personalInfo = result;
        })
    }

    removeReference(reference){
        if(reference.id != null){
            this.personalInfoService.removeReference(reference.id)
            .then((result) => {
                this.personalInfo.references.splice(this.personalInfo.references.indexOf(reference), 1);
                //Message    
            })
        }else{
            this.personalInfo.references.splice(this.personalInfo.references.indexOf(reference), 1);
        }
    }

    /**
     * Image
     */
    updateImage(input){
        let formData = new FormData();
        formData.append('image', input.files[0]);

        this.personalInfoService.updateImage(formData).then( (result) => {
            this.personalInfo = result;
            this.inputFile.value = null;
        });
    }
}