import React, { useState } from 'react'
import reactDom from 'react-dom';

const Inclusions = ({_inclusions = '[]'}) => {

  const [inclusions, setInclusions] = useState(JSON.parse(_inclusions));

  const handleInputChange = (value, index) => {
    setInclusions((prev) => (prev.map((prevInclusion, prevIndex) => {

      if(prevIndex == index) {
        return value;
      }

      return prevInclusion;

    })));
  }

  const handleAddInclusion = () => {
    setInclusions((prev) => ([...prev, '']));
  }

  return (
    <>
      <h2>Inclusions</h2>

      {
        inclusions && inclusions.map((inclusion, index) => <InclusionContainer key={index} index={index} inclusion={inclusion} handleInputChange={handleInputChange}/>)
      }

      <button className='outline-button w-fit' type='button' onClick={handleAddInclusion}>Add Inclusion +</button>
    </>
  )
}

const InclusionContainer = ({inclusion, index, handleInputChange}) => {
  return(
    <div className="form-field-container">
      <label htmlFor={`inclusion${index}`} className="form-label sr-only">Inclusion Number {index}</label>
      <input value={inclusion.name} onInput={(e) => handleInputChange(e.target.value, index)} type="text" name={`inclusions[]`} id={`inclusion${index}`} className="form-input" />
    </div>
  )
}

export default Inclusions

if (document.getElementById("add-inclusions")) {
    const element = document.getElementById("add-inclusions");
    const props = Object.assign({}, element.dataset);
    reactDom.render(
        <Inclusions {...props} />,
        document.getElementById("add-inclusions")
    );
}
