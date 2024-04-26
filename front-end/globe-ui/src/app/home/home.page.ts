import { Component } from '@angular/core';
import { CountriesPage } from '../pages/countries/countries.page';
import { BudgetsPage } from '../pages/budgets/budgets.page';
import { ViewDataPage } from '../pages/view-data/view-data.page';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})
export class HomePage {

  countryComponent = CountriesPage;
  budgetComponent = BudgetsPage;
  viewDataComponent = ViewDataPage;

  component = CountriesPage;
  
  constructor() {}

  setCountryComponent(){
    this.component = CountriesPage;
  }

  setBudgetComponent(){
    this.component = BudgetsPage;
  }

  setDataComponent(){
    this.component = ViewDataPage;
  }
}
