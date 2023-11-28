import React from 'react';

export default function StudentInfo(props) {
  const { name, rollNumber } = props.student;

  return (
    <div>
      <h2>Student Information</h2>
      <p>Name: {name}</p>
      <p>Roll Number: {rollNumber}</p>
    </div>
  );
}

//export default StudentInfo;
