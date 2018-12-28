import { Component, OnInit } from '@angular/core';
import { AdminComponent } from '../admin.component';
import { TranslateService } from '@ngx-translate/core';
import { GraduationService } from '../../services/graduation.service';
import { Graduation } from '../../entity/graduation';

@Component({
    selector: 'graduation',
    templateUrl: 'graduation.component.html'
})

export class GraduationComponent implements OnInit {

    public graduations: Array<Graduation>;

    constructor(
        private translateService: TranslateService,
        public adminComponent: AdminComponent,
        private graduationService: GraduationService
    ) { 
        translateService.get('graduation.page-title').subscribe((pageTitle) => {
            adminComponent.pageTitle = pageTitle;
        });
    }

    ngOnInit() { 
        this.graduationService.listGraduations()
        .then((result: Array<Graduation>) => {
            this.graduations = result;
        })
    }
}