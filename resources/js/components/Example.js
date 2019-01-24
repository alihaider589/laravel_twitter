import React, { Component } from 'react';
import ReactDOM from 'react-dom';
import App from './App'

export default class Example extends Component {
    render() {
            return (
                <div className="container">
                    <div className="row justify-content-center">
                        <div className="col-md-6">
                            <div className="card">
                                <div className="card-header">Tweet description</div>
    
                                <div className="card-body" >
                                Write any thing you like
                                </div>
                            </div>
                        </div>
    
                           <div className="col-md-6">
                            <div className="card">
                                <div className="card-header">Timeline</div>
    
                                <div className="card-body">
                                    Example Timeline
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            );
    
            }
        }

if (document.getElementById('example')) {
    ReactDOM.render(<App />, document.getElementById('example'));
}
