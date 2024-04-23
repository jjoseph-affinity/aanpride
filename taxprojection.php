<!doctype html>
<html lang='en'>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tax Projection - AAN Pride</title>
	<link rel="stylesheet" href="css/aanpride.css">
     <link rel="stylesheet" media="only screen and (min-width: 30em)" href="css/aanpride-desktop.css">
    <link rel="stylesheet" media="only screen and (orientation: landscape)" href="css/aanpride-desktop.css"> 
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
	
<?php //include('header-taxprojection.php');
?>
    
    <form method='post' enctype="multipart/form-data" action='thankyou-taxprojection.php'>
     <table class='centertext'>
  <thead>
    <tr>
      <th colspan="2">Information Needed to do Tax Projections</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Date  <input type='date' name='taxprojectionsdate'><span class='italic bold'>  Fee $50-$100 - Please allow 5 business days for completion.</span></td>
      <td>Advisor Name:  <input type='text' name='taxprojectionsname'></td>
    </tr>
        </tbody>
</table>
    
    
    
    
      
       <table class='centertext'>
  <thead>
    <tr>
      <th colspan="2">Investments Being Moved</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>Name</td>
      <td><input type='text' name='investmentsname'></td>
    </tr>
      
         <tr>
      <td>Company</td>
      <td><input type='text' name='company'></td>
    </tr>
      
      
         <tr>
      <td>Account #</td>
      <td><input type='number' name='accountnumber'></td>
    </tr>
      
      
         <tr>
      <td>Origination Date</td>
      <td><input type='date' name='originationdate'></td>
    </tr>
      
      
         <tr>
      <td>Initial Premium</td>
      <td><input type='number' name='initialpremium'></td>
    </tr>
      
         <tr>
      <td># of Shares</td>
      <td><input type='number' step="1" pattern="\d*" name='numberofshares'></td>
    </tr>
      
      
         <tr>
      <td>Account Value</td>
      <td><input type='number' name='accountvalue'></td>
    </tr>
      
         <tr>
      <td>Penalty</td>
      <td><input type='number' name='penalty'></td>
    </tr>
      
      
         <tr>
      <td>Surrender Amount</td>
      <td><input type='number' name='surrenderamount'></td>
    </tr>
      
             <tr>
      <td>Qualified  <input type='radio' id='qualified' name='qualifiednonqualifiedroth' value='qualified' checked></td>
      <td></td>
    </tr>
      
         <tr>
      <td>Non-Qualified  <input type='radio' id='nonqualified' name='qualifiednonqualifiedroth' value='nonqualified'></td>
      <td></td>
    </tr>
      
         <tr>
      <td>Roth  <input type='radio' id='roth' name='qualifiednonqualifiedroth' value='roth'></td>
      <td></td>
    </tr>
      
         <tr>
      <td id='costbasis1' class='bold'>Cost Basis</td>
      <td id='costbasis2' class='hideme'><input type='number' name='costbasis'></td>
    </tr>
      
      
         <tr>
      <td>Investment Type</td>
      <td><input type='text' placeholder="IRA,401K,Annuity,Insurance" name='type'></td>
    </tr>
      
 
                  <tr>
      <td>(Moving to) Qualified  <input type='radio' id='movingtoqualified' name='movingtoqualified' value='Moving to Qualified' required></td>
      <td></td>
    </tr>
      
         <tr>
      <td>(Moving to) Non-Qualified or Roth conversion  <input type='radio' id='movingtononqualified' name='movingtoqualified' value='Moving to Non-Qualified' required></td>
      <td></td>
    </tr>
      
         <tr>
      <td>None  <input type='radio' id='movingtonone' name='movingtoqualified' value='None' required checked></td>
      <td></td>
    </tr> 
      
      
      
      
         <tr>
      <td>Taxes Withheld when moved  <input type='radio' name='taxeswithheldradio' value='yes' checked><input type='radio' name='taxeswithheldradio' value='no' checked></td>
      <td>Percentage:  <input type='number' name='taxeswithheld'></td>
    </tr>
      
        </tbody>
</table>
    


    <p class='centertext bold'>Select an option:
    
       <select name='monthlyyearly' required>
        <option value='monthly'>Monthly</option>
        <option value='yearly' selected>Yearly</option>
        </select>
    </p>
    
    
    
    
       <table class='centertext'>
  <thead>
    <tr>
      <th colspan="4"></th>
    </tr>
      <tr>
      <td></td>
      <td></td>
      <td class='bold'>Client</td>
      <td class='bold'>Spouse</td>
      </tr>
  </thead>
  <tbody>
    <tr>
      <td class='bold'>Personal:</td>
      <td>Name</td>
      <td><input type='text' name='nameclient'></td>
      <td><input type='text' name='namespouse'></td>
    </tr>
      
          <tr>
      <td class='lightgraybg'></td>
      <td>Birth Dates of Client</td>
      <td><input type='date' name='birthdateclient'></td>
      <td><input type='date' name='birthdatespouse'></td>
    </tr>
      
                <tr>
      <td class='lightgraybg'></td>
      <td>Is anyone blind?</td>
      <td><input type='checkbox' name='blindclient' value='yes'></td>
      <td><input type='checkbox' name='blindspouse' value='yes'></td>
    </tr>
      
                <tr>
      <td class='lightgraybg'></td>
      <td>Number of dependents</td>
      <td><input type='number' name='dependentclient'></td>
      <td><input type='number' name='dependentspouse'></td>
    </tr>
      
          <tr>
      <td class='bold'>Income:</td>
      <td>Annual Social Security Benefit</td>
      <td><input type='number' name='socialsecurityclient'></td>
      <td><input type='number' name='socialsecurityspouse'></td>
    </tr>
      
      
                     <tr>
      <td class='lightgraybg'></td>
      <td>Pension/Annuity income</td>
      <td><input type='number' name='pensionannuityincomeclient'></td>
      <td><input type='number' name='pensionannuityincomespouse'></td>
    </tr>
      
                     <tr>
      <td class='lightgraybg'></td>
      <td>IRA income</td>
      <td><input type='number' name='iraincomeclient'></td>
      <td><input type='number' name='iraincomespouse'></td>
    </tr>
      
                     <tr>
      <td class='lightgraybg'></td>
      <td>Wages</td>
      <td><input type='number' name='wagesclient'></td>
      <td><input type='number' name='wagesspouse'></td>
    </tr>
      
                     <tr>
      <td class='lightgraybg'></td>
      <td>Interest income</td>
      <td><input type='number' name='interestincomeclient'></td>
      <td><input type='number' name='interestincomespouse'></td>
    </tr>
      
                     <tr>
      <td class='lightgraybg'></td>
      <td>Dividend income</td>
      <td><input type='number' name='dividendincomeclient'></td>
      <td><input type='number' name='dividendincomespouse'></td>
    </tr>
      
                     <tr>
      <td class='lightgraybg'></td>
      <td>Capital Gain/Loss  (Sch D)</td>
      <td><input type='number' name='capitalgainlossclient'></td>
      <td><input type='number' name='capitalgainlossspouse'></td>
    </tr>
      
                     <tr>
      <td class='lightgraybg'></td>
      <td>Other Income:</td>
      <td><input type='number' name='otherincomeclient'></td>
      <td><input type='number' name='otherincomespouse'></td>
    </tr>
      
                     <tr>
      <td class='lightgraybg'></td>
      <td>Rental/Royalties Sch E</td>
      <td><input type='number' name='rentalroyaltiesclient'></td>
      <td><input type='number' name='rentalroyaltiesspouse'></td>
    </tr>
      
                     <tr>
      <td class='lightgraybg'></td>
      <td>Sch C - Business</td>
      <td><input type='number' name='businessclient'></td>
      <td><input type='number' name='businessspouse'></td>
    </tr>
      
           <tr>
      <td class='bold'>Deductions:</td>
      <td>Medical</td>
      <td><input type='number' name='medicalclient'></td>
      <td><input type='number' name='medicalspouse'></td>
    </tr>
      
                   <tr>
      <td class='lightgraybg'></td>
      <td>Long term care Insurance</td>
      <td><input type='number' name='longtermcareinsuranceclient'></td>
      <td><input type='number' name='longtermcareinsurancespouse'></td>
    </tr>
      
                        <tr>
      <td class='lightgraybg'></td>
      <td>Real Estate Taxes</td>
      <td><input type='number' name='realestatetaxesclient'></td>
      <td><input type='number' name='realestatetaxesspouse'></td>
    </tr>
      
                        <tr>
      <td class='lightgraybg'></td>
      <td>Mortgage Interest</td>
      <td><input type='number' name='mortgageinterestclient'></td>
      <td><input type='number' name='mortgageinterestspouse'></td>
    </tr>
      
                        <tr>
      <td class='lightgraybg'></td>
      <td>Charitable Contributions</td>
      <td><input type='number' name='charitablecontributionsclient'></td>
      <td><input type='number' name='charitablecontributionsspouse'></td>
    </tr>
      
        </tbody>
</table>
    
    
    
    
 <table class='centertext'>
  <thead>
    <tr>
      <th colspan="2"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>What kind of care do they receive?</td>
      <td>
        <select name='care'>
            <option value='No deductions'>No deductions</option>
            <option value='Maybe some deductions'>Maybe some deductions</option>
            <option value='Full deductions'>Full deductions</option>
          </select>
        
        </td>
    </tr>
      
      <tr>
      <td>Cost?</td>
      <td><input type='number' name='cost'></td>
    </tr>
       
  </tbody>
</table>
    
    <br><br>
    
    
    
    
     <p class='centertext bold'>Please supply previous year or 2 tax returns</p>
    
        <p class='centertext bold'> *Minimum of 1 tax return required* PDFs only (.pdf) 5MB is the file size limit</p>    
        
    <p class='centertext'>Tax Form 1  <span class='redtext'>*Required*</span><input type='file' id='taxreturn1' accept='*.pdf' min="1" max="1" max-file-size="5000000" size='5000000' total-max-size="5000000" placeholder='Tax returns required' name='taxreturn1' required></p>
    
    <p id='size1' class='centertext'></p>
        
        <p class='centertext'>Tax Form 2  <span class='darkgreentext'>(optional)</span><input type='file' id='taxreturn2' accept='*.pdf' min="1" max="1" max-file-size="5000000" size='5000000' total-max-size="5000000" placeholder='Tax returns required' name='taxreturn2'></p>
    
    <p id='size1' class='centertext'></p>
        
        <p class='centertext margin10-topbottom-'>Description of Reason for the Tax Plan</p><p class='centertext'><textarea cols='50' rows='25' placeholder='Please provide a description of reason for the tax plan here...' name='comments'></textarea></p>
    
    <p class='centertext'><input type='submit' value='Submit form'></p>
    </form>
	<!--<script src='js/header.js' defer></script>-->
    <script src='js/taxprojection.js' defer></script>
    
</body>
</html>
