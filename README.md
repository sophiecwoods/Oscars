# Second Coursework for Internet and Web Technologies module (2021/22)

The purpose of this coursework is to help you learn about using server-side PHP to process XML documents and return results over the web. The coursework will be assessed and counts 10% of the final mark for this module.

## The task

The XML document you will be working with (oscars.xml) gives details of nominations for the Academy Awards (Oscars) from 1960 to 2010. For each nomination (represented by a Nomination element), the file contains information about the year (Year), category (Category), and nominee (Nominee). The year values in fact contain both the calendar year and the number of years since the start of the awards (e.g., "1960 (33rd)"). The category contains values such as "Best Picture" or "Actress -- Leading Role". The nominee is either a person (e.g., for the category "Actress -- Leading Role") or a film (e.g., "Best Picture"). There is also an Info element for each nomination. As an example, when the category is "Actress -- Leading Role", this contains the name of the film and the character played by the actress in it. Finally, each nomination has a Won element, with value "yes" if the nominee won the Academy Award, and "no" if not.

The product of the coursework should be an HTML page which a user can use to query information about the Academy Awards contained in the XML file. You should use an HTML form along with PHP and XSLT on the server to implement your solution, which should work in any browser since the HTML will comprise only a simple form.

The tasks you need to perform are as follows:

1. Develop an XSLT stylesheet which will transform the XML data into an HTML table with columns for Year, Category, Nominee, Info and Won. So for the first nominations in the file, the table might look as follows:

| Year          | Category                | Nominee         | Info                                    | Won?     | 
| :------------ | :-------------          | :------------   | :-------------------------------------- | :------  | 
| 2010 (83rd)   | Actor -- Leading Role   | Javier Bardem   | Biutiful {'Uxbal'}                      | no       |   
| 2010 (83rd)   | Actor -- Leading Role   | Jeff Bridges    | True Grit {'Rooster Cogburn'}           | no       | 
| 2010 (83rd)   | Actor -- Leading Role   | Jesse Eisenberg | The Social Network {'Mark Zuckerberg'}  | no       |   
| 2010 (83rd)   | Actor -- Leading Role   | Colin Firth     | The King's Speech {'King George VI'}    | yes      | 
| 2010 (83rd)   | Actor -- Leading Role   | James Franco    | 127 Hours {'Aron Ralston'}              | no      | 

2. The stylesheet you develop will be used in solving the next part of the coursework assignment.

3. Now create a web page containing an HTML form which will allow a user to restrict the data to be displayed as follows:
  1. For each of year, category, info and nominee, the user should be able to enter a value in a text box, as well as select whether they want the corresponding element to contain the value or not be restricted at all. The string matching can be by "exact match" (i.e., case sensitive), which is easiest to do.
  2. The user should be able to specify that they want all nominations, only those that won, or only those that did not win.

4. The user should be able to use any combination of the above restrictions, so, for example, to ask for all winning nominations in 2010 where "Leading" is part of the category. This would return Colin Firth and Natalie Portman, who won the Leading Actor and Leading Actress categories in 2010. On the other hand, if the user enters no restrictions, all results should be returned.

The data the user enters in the form should be passed to a PHP program on a web server. 
