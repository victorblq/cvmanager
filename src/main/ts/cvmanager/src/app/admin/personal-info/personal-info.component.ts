import { Component, OnInit, ViewChild, ElementRef, ComponentRef } from '@angular/core';
import { PersonalInfo } from '../../entity/personal-info';
import { Phone } from '../../entity/phone';
import { Email } from '../../entity/email';
import { Reference } from '../../entity/reference';
import { PersonalInfoService } from '../../services/personal-info.service';
import { NavbarComponent } from '../components/navbar/navbar.component';
import { TranslateService } from '@ngx-translate/core';
import { AdminComponent } from '../admin.component';
import { NotificationService } from '../../services/notification.service';


@Component({
    selector: 'personal-info',
    templateUrl: 'personal-info.component.html'
})
export class PersonalInfoComponent implements OnInit {
    
    @ViewChild("inputFile") 
    inputFile: ElementRef;
    
    public personalInfo: PersonalInfo = new PersonalInfo();
    public imagePath: string;

    constructor(
        private personalInfoService: PersonalInfoService,
        private translateService: TranslateService,
        public adminComponent: AdminComponent,
        private notificationService: NotificationService
    ) { 
        translateService.get('personal-info.page-title').subscribe((pageTitle) => {
            adminComponent.pageTitle = pageTitle;
        });
    }
    
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

            this.translateService.get('personal-info.phone-saved').subscribe((phoneSavedText) => {
                this.notificationService.showNotification('top', 'right', 'success', phoneSavedText);
            });
        })
        .catch((error) => {
            this.translateService.get('error').subscribe((errorText) => {
                this.notificationService.showNotification('top', 'right', 'danger', errorText);
            });
        });
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

            this.translateService.get('personal-info.email-saved').subscribe((emailSavedText) => {
                this.notificationService.showNotification('top', 'right', 'success', emailSavedText);
            });
        })
        .catch((error) => {
            this.translateService.get('error').subscribe((errorText) => {
                this.notificationService.showNotification('top', 'right', 'danger', errorText);
            });
        });
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
            
            this.translateService.get('personal-info.reference-saved').subscribe((referenceSavedText) => {
                this.notificationService.showNotification('top', 'right', 'success', referenceSavedText);
            });
        })
        .catch((error) => {
            this.translateService.get('error').subscribe((errorText) => {
                this.notificationService.showNotification('top', 'right', 'danger', errorText);
            });
        });
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
            this.translateService.get('personal-info.image-updated').subscribe((imageUpdatedText) => {
                this.notificationService.showNotification('top', 'right', 'success', imageUpdatedText);
            });
            
            this.personalInfo = result;
            this.inputFile.nativeElement.value = "";
            this.imagePath = null;
        });
    }
}