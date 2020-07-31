import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class SearchRepublicService {

  apiURL: string = 'http://localhost:8000/api/republic/';

  constructor(public http: HttpClient) {  }

  getRepublicsByPrice(list: number): Observable<any>{
    return this.http.get(this.apiURL + 'lowerToHigher/' + list);
  }

  getRepublicWithHighRating(): Observable<any>{
    return this.http.get(this.apiURL + 'rate/highRating');
  }

  getRepublics(): Observable<any>{
    return this.http.get(this.apiURL);
  }
}
