import React, { useState } from 'react';

export default function InputPage({ history }) {
  const [student, setStudent] = useState({
    name: '',
    rollNumber: '',
  });

  const handleInputChange = (e) => {
    const { name, value } = e.target;
    setStudent({
      ...student,
      [name]: value,
    });
  };

  const handleSubmit = () => {
    // Here, you can save student data and results to a state or context or send them to an API.
    // For simplicity, we'll just navigate to the result page.
    history.push('/result', { studentData: student });
  };

  return (
    <div>
      <h1>Input Page</h1>
      <form>
        <label>
          Name:
          <input
            type="text"
            name="name"
            value={student.name}
            onChange={handleInputChange}
          />
        </label>
        <label>
          Roll Number:
          <input
            type="text"
            name="rollNumber"
            value={student.rollNumber}
            onChange={handleInputChange}
          />
        </label>
        <button type="button" onClick={handleSubmit}>
          Submit
        </button>
      </form>
    </div>
  );
}

//export default InputPage;
