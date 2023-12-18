import React from 'react';
import ReactDOM from 'react-dom/client';
import './index.css';
import App from './App';
import Form from './components/Form';
import reportWebVitals from './reportWebVitals';

const root = ReactDOM.createRoot(document.getElementById('root'));
root.render(
  <React.StrictMode>
    <Form title="Hello world!" method="post" action="https://www.google.com">

    </Form> 
    <Form title="Youtube" method="post" action="https://www.youtube.com">

    </Form> 
    <Form title="Facebook" method="post" action="https://www.facebook.com">

    </Form> 
  </React.StrictMode>
);

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
