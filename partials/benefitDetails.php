    <?php
        include_once 'conn.php';
        $scholarshipResult=$dbconn->query('select * from scholarships');
        $scholarship=$scholarshipResult->fetch_assoc();   
    ?>
    
<div class="benefits">
        <h2>Scholarship Benefits</h2>

<table border=1>
    <tr>
        <th>Label</th>
        <th>Description</th>
        <th>Amount</th>
        <th>Per Semester</th>
    </tr>
    <?php
        $benefits = $dbconn->query('SELECT * FROM scholarships_benefits');

        foreach($benefits as $benefit) {
            echo "
            <tr>
            <td>{$benefit['label']}</td>
                <td>{$benefit['description']}</td>
                
                <td>{$benefit['amount']}</td>
                <td>{$benefit['per_semester']}</td>
            </tr>
            ";
        }
    ?>
</table>
    </div>