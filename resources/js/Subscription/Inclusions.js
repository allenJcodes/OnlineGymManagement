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

      <button onClick={handleAddInclusion}>Add Inclusion +</button>
    </>
  )
}

const InclusionContainer = ({inclusion, index, handleInputChange}) => {
  return(
  <div className="inclusion-container after:relative z-0 w-full mb-6 group text-background">
      <input value={inclusion.name} onInput={(e) => handleInputChange(e.target.value, index)} type="text" name={`inclusions[]`} id={`inclusion${index}`} className="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder="" required />
      <label htmlFor={`inclusion${index}`} className="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:left-0 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">
          Inlcusion {index}
      </label>
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
