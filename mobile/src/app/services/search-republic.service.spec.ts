import { TestBed } from '@angular/core/testing';

import { SearchRepublicService } from './search-republic.service';

describe('SearchRepublicService', () => {
  let service: SearchRepublicService;

  beforeEach(() => {
    TestBed.configureTestingModule({});
    service = TestBed.inject(SearchRepublicService);
  });

  it('should be created', () => {
    expect(service).toBeTruthy();
  });
});
