
import React, { Component } from 'react';
import axios from 'axios';



export default class App extends Component {
    constructor (props) {
super (props),


//humy is functions ko dosri jaga use krwany kai liye is ko bind karwana hoga 

this.handlesubmit = this.handlesubmit.bind(this);    
this.handleChange = this.handleChange.bind(this);
this.renderpost =this.renderpost.bind(this);

//ye react ki extension by default set krrha h 

this.state={
    body:'',
    posts:[],
    loading:false
}
    }

    //sary posts ko render karwa rha h database sai ye function
    getPosts() {
        // this.setState({ loading: true });
        axios.get('/posts').then((
            response // console.log(response.data.posts)
        ) =>
            this.setState({
                posts: [...response.data.posts],
                // loading: false
            })
        );
    }
    //getpost kai method ko render karwa rha h 

    componentWillMount() {
        this.getPosts();
    }

componentDidMount(){
 this.interval= setInterval(() => this.getPosts(),1000);
}
componentWillUnmount(){
    clearInterval(this.interval);
}

//ye wala function jo bhi post hai usko array mai daly ga you can easily check it out on react extension 
    handlesubmit(e)
    {
        e.preventDefault();
        // this.PostData();
        axios.post('/posts',{
            body:this.state.body
        }).then((response)=>{
            this.setState({
                posts: [...this.state.posts,response.data],
            body:''
        });
    });
    
             
    }
//render post ka model h jo neechy sari posts ko database sai render karwaye ga!
    renderpost(){
        {return this.state.posts.map(post=> <div key={post.id} className="media">
                          <div className="media-left">
                         
                            </div>
                            <div className="media-body">
                            <a href={`/users/${post.user.username}`}><b>{post.user.username}</b></a>{' '}
                        - {post.created_at}
                        

                         <p> {post.body}</p>
                         </div>
                        </div>)}
    }
    //ye function posts ki route sai data lai kr aye ga 
    PostData(){
        axios.post('/posts',{
            body:this.state.body
        })
    }
    //React ki extension mai body ki value daly ga ye 
    handleChange(e){
        this.setState({
            body: e.target.value
            
        })
  
    }
    //ye home page ko render karwa rha h poora home page yaha sai handle hoga 
    render() {
        return (
         <div className="container">
                <div className="row justify-content-center">
                    <div className="col-md-6">
                        <div className="card">
                            <div className="card-header" > Tweet  something</div>

                            <div className="card-body" >
                             <div></div>
                              <form onSubmit={this.handlesubmit}>
                                  <div className="form-group" >
                                 
                                  
                                    <textarea 
                                    className="form-control" 
                                    name="" 
                                    id=""
                                value={this.state.body}
                                     rows="5" 
                                     maxLength="150"
                                      placeholder="What's in your mind my boy!"
                                       onChange={this.handleChange} 
                                       required />
                                 </div>
                                 <input type="submit" className="btn btn-primary btn-block" value="Post"  />
                                  
                              </form>
                            </div>
                        </div>
                    </div>

                              <div className="col-md-6">
                        <div className="card">
                            <div className="card-header">Recent Tweets</div>

                            <div className="card-body">
                         {!this.state.loading ? this.renderpost():'Loading'}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}
