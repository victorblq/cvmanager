import { Component, OnInit } from '@angular/core';
import { TranslateService } from '@ngx-translate/core';
import { AdminComponent } from '../admin.component';

@Component({
    selector: 'admin-home',
    templateUrl: 'admin-home.component.html'
})

export class AdminHomeComponent implements OnInit {
    
    constructor(
        private translateService: TranslateService,
        public adminComponent: AdminComponent
    ) { 
        translateService.get('dashboard.page-title').subscribe((pageTitle) => {
            adminComponent.pageTitle = pageTitle;
        });
    }

    ngOnInit() { }

}