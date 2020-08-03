import { Component, OnInit } from '@angular/core';
import { Republic } from '../../models/republic';
import { SearchRepublicService } from '../services/search-republic.service';

@Component({
  selector: 'app-home',
  templateUrl: './home.page.html',
  styleUrls: ['./home.page.scss'],
})

export class HomePage implements OnInit {

  public republics : Array<Republic>;
  
  constructor( public searchRepublicService: SearchRepublicService) {
    this.republics = [];
   }
  

  ngOnInit() {
    this.getRepublics();
  }

  getRepublics() {
    this.searchRepublicService.getRepublics().subscribe((res) => {
      this.republics = res;
    })
  }

  lowerPrice()
  {
    this.searchRepublicService.getRepublicsByPrice(10).subscribe ( (res) => {
      this.republics = res;
    })
  }

  highRating() 
  {
    this.searchRepublicService.getRepublicWithHighRating().subscribe((res) => {
      this.republics = res;
    })
  }

}
