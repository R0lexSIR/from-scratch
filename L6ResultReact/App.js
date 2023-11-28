import React, { useState } from "react";
import "./App.css"; // Import your CSS file
import StudentInfo from "./StudentInfo";
import ResultTable from "./ResultTable";

function App() {
  const [student, setStudent] = useState({
    name: "",
    rollNumber: "",
  });

  const [results, setResults] = useState([
    { subject: "Computer Networks", mseMarks: "", eseMarks: "" },
    {
      subject: "Design and Analysis of Algorithms",
      mseMarks: "",
      eseMarks: "",
    },
    { subject: "Web Technology", mseMarks: "", eseMarks: "" },
    { subject: "Software Modeling and Design", mseMarks: "", eseMarks: "" },
  ]);

  const handleStudentInputChange = (e) => {
    const { name, value } = e.target;
    setStudent({
      ...student,
      [name]: value,
    });
  };

  const handleResultInputChange = (e, index) => {
    const { name, value } = e.target;
    const updatedResults = [...results]; // Clone the array
    updatedResults[index][name] = value;
    setResults(updatedResults);
  };

  return (
    <div className="App">
      <h1>VIT Semester Result</h1>
      <form>
        <h2>Student Information</h2>
        <label>
          Name:
          <input
            type="text"
            name="name"
            value={student.name}
            onChange={handleStudentInputChange}
            width="96%"
          />
        </label>
        <label>
          Roll Number:
          <input
            type="text"
            name="rollNumber"
            value={student.rollNumber}
            onChange={handleStudentInputChange}
            width="96%"
          />
        </label>
      </form>
      <ResultTable
        results={results}
        onResultInputChange={handleResultInputChange}
      />
    </div>
  );
}

export default App;
