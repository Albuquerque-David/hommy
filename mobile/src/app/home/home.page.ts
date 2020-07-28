import { Component, OnInit } from '@angular/core';
import { Republic } from '../../models/republic';

@Component({
  selector: 'app-home',
  templateUrl: './home.page.html',
  styleUrls: ['./home.page.scss'],
})

export class HomePage implements OnInit {

  republics : Array<Republic>;
  
  constructor() {
    this.republics = [];
   }
  

  ngOnInit() {
    this.republics[0] = {
      id: 1,
      value: Math.floor((Math.random() * 2300) + 1) + 300,
      state: 'RJ',
      city: 'Rio de Janeiro',
      address: 'Rua dos Fulanos nº' + Math.floor((Math.random() * 100) + 1).toString(),
      bedrooms: Math.floor((Math.random() * 10) + 1),
      bathrooms: Math.floor((Math.random() * 10) + 1),
      allowedTo: 'Feminino',
      neighborhood: 'Méier',
      rating: Math.floor((Math.random() * 5) + 1)
    }

    this.republics[1] = {
      id: 2,
      value: Math.floor((Math.random() * 2300) + 1) + 300,
      state: 'RJ',
      city: 'Rio de Janeiro',
      address: 'Rua dos Fulanos nº' + Math.floor((Math.random() * 100) + 1).toString(),
      bedrooms: Math.floor((Math.random() * 10) + 1),
      bathrooms: Math.floor((Math.random() * 10) + 1),
      allowedTo: 'Masculino',
      neighborhood: 'Leblon',
      rating: Math.floor((Math.random() * 5) + 1)
    }

    this.republics[2] = {
      id: 3,
      value: Math.floor((Math.random() * 2300) + 1) + 300,
      state: 'RJ',
      city: 'Rio de Janeiro',
      address: 'Rua dos Fulanos nº' + Math.floor((Math.random() * 100) + 1).toString(),
      bedrooms: Math.floor((Math.random() * 10) + 1),
      bathrooms: Math.floor((Math.random() * 10) + 1),
      allowedTo: 'Masculino',
      neighborhood: 'Botafogo',
      rating: Math.floor((Math.random() * 5) + 1)
    }

    this.republics[3] = {
      id: 4,
      value: Math.floor((Math.random() * 2300) + 1) + 300,
      state: 'RJ',
      city: 'Rio de Janeiro',
      address: 'Rua dos Fulanos nº' + Math.floor((Math.random() * 100) + 1).toString(),
      bedrooms: Math.floor((Math.random() * 10) + 1),
      bathrooms: Math.floor((Math.random() * 10) + 1),
      allowedTo: 'Ambos',
      neighborhood: 'Centro',
      rating: Math.floor((Math.random() * 5) + 1)
    }

    this.republics[4] = {
      id: 5,
      value: Math.floor((Math.random() * 2300) + 1) + 300,
      state: 'RJ',
      city: 'Rio de Janeiro',
      address: 'Rua dos Fulanos nº' + Math.floor((Math.random() * 100) + 1).toString(),
      bedrooms: Math.floor((Math.random() * 10) + 1),
      bathrooms: Math.floor((Math.random() * 10) + 1),
      allowedTo: 'Masculino',
      neighborhood: 'Ilha do Governador',
      rating: Math.floor((Math.random() * 5) + 1)
    }

    this.republics[5] = {
      id: 6,
      value: Math.floor((Math.random() * 2300) + 1) + 300,
      state: 'RJ',
      city: 'Rio de Janeiro',
      address: 'Rua dos Fulanos nº' + Math.floor((Math.random() * 100) + 1).toString(),
      bedrooms: Math.floor((Math.random() * 10) + 1),
      bathrooms: Math.floor((Math.random() * 10) + 1),
      allowedTo: 'Feminino',
      neighborhood: 'Glória',
      rating: Math.floor((Math.random() * 5) + 1)
    }

    this.republics[6] = {
      id: 7,
      value: Math.floor((Math.random() * 2300) + 1) + 300,
      state: 'RJ',
      city: 'Rio de Janeiro',
      address: 'Rua dos Fulanos nº' + Math.floor((Math.random() * 100) + 1).toString(),
      bedrooms: Math.floor((Math.random() * 10) + 1),
      bathrooms: Math.floor((Math.random() * 10) + 1),
      allowedTo: 'Ambos',
      neighborhood: 'Largo do Machado',
      rating: Math.floor((Math.random() * 5) + 1)
    }

  }

}
