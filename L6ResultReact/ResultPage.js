import React from 'react';
import { useLocation } from 'react-router-dom';

export default function ResultPage() {
  const location = useLocation();
  const studentData = location.state.studentData;

  // Here, you can calculate and display the results based on studentData.
  // For simplicity, we'll just display the received data.
  return (
    <div>
      <h1>Result Page</h1>
      <p>Name: {studentData.name}</p>
      <p>Roll Number: {studentData.rollNumber}</p>
      {/* Display calculated results here */}
    </div>
  );
}

//export default ResultPage;
