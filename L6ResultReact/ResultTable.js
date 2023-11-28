import React from 'react';

export default function ResultTable(props) {
  const { results, onResultInputChange } = props;

  return (
    <div>
      <h2>Results</h2>
      <table>
        <thead>
          <tr>
            <th>Subject</th>
            <th>MSE Marks</th>
            <th>ESE Marks</th>
            <th>Total Marks</th>
          </tr>
        </thead>
        <tbody>
          {results.map((result, index) => (
            <tr key={index}>
              <td>{result.subject}</td>
              <td>
                <input
                  type="number"
                  name="mseMarks"
                  value={result.mseMarks}
                  onChange={(e) => onResultInputChange(e, index)}
                />
              </td>
              <td>
                <input
                  type="number"
                  name="eseMarks"
                  value={result.eseMarks}
                  onChange={(e) => onResultInputChange(e, index)}
                />
              </td>
              <td>{calculateTotalMarks(result.mseMarks, result.eseMarks)}</td>
            </tr>
          ))}
        </tbody>
      </table>
    </div>
  );
}

// Helper function to calculate total marks
function calculateTotalMarks(mseMarks, eseMarks) {
  const mseWeight = 0.3;
  const eseWeight = 0.7;
  return (mseMarks * mseWeight + eseMarks * eseWeight).toFixed(2);
}

//export default ResultTable;
