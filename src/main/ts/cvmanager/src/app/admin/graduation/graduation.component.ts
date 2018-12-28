import { Component, OnInit } from '@angular/core';
import { AdminComponent } from '../admin.component';
import { TranslateService } from '@ngx-translate/core';

@Component({
    selector: 'graduation',
    templateUrl: 'graduation.component.html'
})

export class GraduationComponent implements OnInit {
    constructor(
        private translateService: TranslateService,
        public adminComponent: AdminComponent
    ) { 
        translateService.get('graduation.page-title').subscribe((pageTitle) => {
            adminComponent.pageTitle = pageTitle;
        });
    }

    ngOnInit() { }
}