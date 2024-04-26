import { Component, Input, OnInit } from '@angular/core';
import { BudgetsPage } from 'src/app/pages/budgets/budgets.page';
import { CountriesPage } from 'src/app/pages/countries/countries.page';
import { ViewDataPage } from 'src/app/pages/view-data/view-data.page';
import { ApiService } from 'src/app/services/api.service';

@Component({
  selector: 'app-main-toolbar',
  templateUrl: './main-toolbar.component.html',
  styleUrls: ['./main-toolbar.component.scss'],
})
export class MainToolbarComponent  implements OnInit {

  @Input() previousUrl: string = '';
  @Input() forwardsUrl: string = '';

  availableLanguages: any[] = [];
  queryHistorical: any[] = [];

  constructor(private apiSvc: ApiService) { }

  ngOnInit() {
    this.apiSvc.get('/language/getLanguages').then(async resp => {
      console.log('Lenguajes obtenidos: ', resp);
      this.availableLanguages = resp;
    }).catch(err => console.error('Error al obtener los lenguajes...', err));
  }

}
