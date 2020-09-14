<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Online Exams <span class="float-right">{{questionIndex}}/{{questions.length}}</span></div>

                    <div class="card-body">
                      <div v-for="(question,index) in questions">
                          <div v-show="(index === questionIndex)">
                          {{question.question}}
                          <ol type="A">
                          <li v-for="choice in question.answers">
                              <label>
                                  <input type="radio"
                                  :value="choice.is_correct==true?true:choice.answer"
                                  :name="index"
                                  v-model="userResponses[index]"
                                  @click="choices(question.id,  choice.id)"
                                  >
                                  {{choice.answer}}

                              </label>
                          </li>
                          </ol>
                        </div>

                      </div>
                      <div v-show="questionIndex!=questions.length">
                        <button class="btn btn-success float-right"@click="prev()">Prev</button>
                        <button class="btn btn-success float-left"@click="next()">Next</button>
                      </div>
                       <div v-show="questionIndex===questions.length">
                        <p>
                            <center>
                                Your Result: <b>{{score()}}</b> out of <b>{{questions.length}}</b> questions
                            </center>
                        </p>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>n

<script>
    export default {
        props:['quiz', 'quizQuestions', 'hasQuizTaken', 'times'],

        data(){
            return{
                questions:this.quizQuestions,
                questionIndex:0,
                userResponses:Array(this.quizQuestions.length).fill(false),
                currentAnswer: 0,
                currentQuestion:0,

            }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods: {
            next() {
                this.questionIndex++;
            },
            prev() {
                this.questionIndex--;
            },
            choices(question,answer){
                this.currentAnswer = answer,
                this.currentQuestion = question
            },
            score(){
                return this.userResponses.filter((val)=>{
                    return val===true;
                }).length*2;
            }
        }
    }
</script>
