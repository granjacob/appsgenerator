import React from "react";

function Form( props ) {
    return (
      <form className={"form" + props.name} method={props.method} action={props.action}>
      <h1>{props.title}</h1>
      <input type="submit" value="Enviar"/>
      </form>
    );
};

export default Form;
