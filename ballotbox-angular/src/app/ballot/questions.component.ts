import { Component, OnInit, Input } from '@angular/core';

@Component({
  selector: 'app-questions',
  templateUrl: './questions.component.html',
})
export class QuestionsComponent implements OnInit {
  @Input() questions: any;
  @Input() ballotId: number;

  constructor() { }

  ngOnInit() {
  }

}
