

import java.io.IOException;
import java.io.PrintWriter;
import java.util.ArrayList;
import java.text.SimpleDateFormat;  
import java.util.Date;  

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

@WebServlet("/servletSession")
public class servletSession extends HttpServlet 
{	
   // Location of servlet. 
   // static String url = "http://labunix03.cs.virginia.edu:8080/up3f/examples.servletSession";   // labunix	
   static String url = "http://localhost:8080/StoryShare_Servlet/servletSession";
   // note: domain="localhost:8080", path="/cs4640s18/", servlet="examples.servletSession"
   
   // to access the servlet
   // (local) 
   //    http://localhost:8080/cs4640s18/examples.servletSession
   // (labunix03) 
   //    http://labunix03:8080/up3f/examples.servletSession  
	
   // Important note: labunix does not support servlet annotation and thus using @WebServlet does not work
   // You need to manually do servlet mapping using web.xml file
   
   String msg = "";
   
   public void doGet(HttpServletRequest request, HttpServletResponse response) 
               throws ServletException, IOException 
   {
      response.setContentType("text/html");
      PrintWriter out = response.getWriter();
	   
      HttpSession session = request.getSession(); 
      
      String action = request.getParameter("action");
      if (action != null && action.equals("invalidate"))
      {  // Called from the invalidate button, kill the session
         // get session, then invalidate it
    	 // HttpSession session = request.getSession();
         session.invalidate();	  
         
         out.println("<html>");
         out.println("<head>"); 
         out.println("<title>Servlet example</title>");
         out.println("<link rel=stylesheet href='styles/example-style.css' type='text/css'>");
         out.println("</head>");  
         out.println("<body>");
         out.println("  <div>");
         out.println("    <h1>Servlet example</h1>");
         out.println("    Your session have been invaldiated <br/><br/>");
         out.println("    <a href=\"" + url + "\"?createSession\">Create new session</a>");
         out.println("  </div>");
         out.println("</body>");
         out.println("</html>");                  
      }
      else
      { 
         // get session
     	 // HttpSession session = request.getSession();
      
         out.println("<html>");
         out.println("<head>"); 
         out.println("<title>Servlet example</title>");
         out.println("<link rel=stylesheet href='styles/example-style.css' type='text/css'>");
         out.println("</head>");  
         out.println("<body>");
         out.println("  <div>");
         
         out.println("    <h2>Welcome " + session.getAttribute("username") + "</h2>");
         
         out.println("<table>");
      
         out.println("  <tr>");
         out.println("    <td>Session Status</td>");
         if (session.isNew())
            out.println ("    <td>New Session</td>");
         else
            out.println ("    <td>Old Session</td>");
         out.println("  </tr>");

         out.println("  <tr>");      
         // Get the session ID
         out.println("    <td>Session ID</td>");
         out.println("    <td>" + session.getId() + "</td>");      
         out.println("  </tr>");
      
         out.println("  <tr>");      
         // Get the created time, convert it to a Date object
         out.println("    <td>Creation Time</td>");
         out.println("   <td>" + new Date (session.getCreationTime()) + "</td>");      
         out.println("  </tr>");
      
         out.println("  <tr>");            
         // Get the last time it was accessed
         out.println("    <td>Last Accessed Time</td>");
         out.println("    <td>" + new Date(session.getLastAccessedTime()) + "</td>");
         out.println("  </tr>");
      
         out.println("  <tr>");                  
         // Get the max-inactive-interval setting
         out.println("    <td>Maximum Inactive Interval (seconds)</td>");
         out.println("    <td>" + session.getMaxInactiveInterval() + "</td>");
         out.println("  </tr>");
      
         out.println("</table>");
      
         out.println("<br/><br/><a href=\"" + url + "?action=invalidate\">Invalidate the session</a>");
         
         //out.println("<br/><br/><a href=\"http://localhost/cs4640s18/php-servlet/contact_us.php\">Contact us</a>");
         
         out.println("  </div>");
         out.println("</body>");
         out.println("</html>");
      }
      doPost(request, response);
      out.close();      
            
   }

   public void doPost(HttpServletRequest request, HttpServletResponse response) 
               throws ServletException, IOException 
   {
      response.setContentType("text/html");
      PrintWriter out = response.getWriter();
      
      String username = request.getParameter("username");
      String email = request.getParameter("emailaddr");
      String comment = request.getParameter("comment"); 
      
//      if (username != null && email != null && comment != null)
//      {    	 	 
         printConfirmation(username, comment, email, out);
//         doGet(request, response);       // submit more comment?
//      }
//      else
//      {
//         msg = "Please enter your information";
//         doGet(request, response);
//      }
//      
      out.close();
   }


//  Instead of mixing html in java (refer to out.println() in doGet()), 
//  some developers prefer to separate them as much as possible. 
//  You may comment the out.println() in doGet() and have doGet() call other java functions
//  to do create the html document (for example, call printHTML() below)
//    
//   private void printHTML(PrintWriter out)
//   {
//      String str_head = 
//         "<html>" +
//         "<head>" + 
//         "  <title>Servlet example</title>" +
//         "  <link rel=stylesheet href='styles/example-style.css' type='text/css'>" +
//         "</head>"; 
//      
//      String str_body = 
//         "<body>" +
//         "  <div>" +
//         "    <h1>Servlet example</h1>";
//	    	      
//         if (msg.length() > 0)
//            str_body = str_body + "<br/>" + "<span class='msg'>" + msg + "</span> <br/><br/>";           
//	    	      
//         str_body += 
//            "    <form action='" + url + "' method='post' onsubmit='return (validateInput())' >" +
//            "      <label>Name: </label>" +
//            "      <input type='text' id='user' name='username' autofocus /> <br/>" +         
//            "      <label>Email: </label>" +
//            "      <input type='text' id='email' name='emailaddr'  /> <br/>" +
//            "      <label>Comment: </label>" +
//            "      <textarea rows='5' cols='40' id='comment' name='comment'></textarea> <br/>" +
//            "      <input type='submit' value='Submit comment' />" +
//            "    </form>" +
//            "  </div>" +
//            "</body>" + 
//            "</html>";     
//         
//      String str_html = str_head + "<br/>" + str_body;
//      out.println(str_html);      
//   }
//   
   
   private void printConfirmation(String username, String comment, String email, PrintWriter out)
   {
      SimpleDateFormat formatter = new SimpleDateFormat("dd/MM/yyyy HH:mm:ss");  
      Date date = new Date();  
	   
      out.println("<br/><br/>Thanks for this comment, " + username + "<br/>");
      out.println("<i>" + comment + "</i> (submitted on " + formatter.format(date) + ") <br/>");
      out.println("We will reply to " + email  + "<br/>");     
   }

}

