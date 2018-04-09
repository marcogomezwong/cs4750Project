//Code based on servlet_php.java example given in class

import java.io.IOException;
import java.io.PrintWriter;

import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;

/**
 * Servlet implementation class LoginServlet
 */
@WebServlet("/LoginServlet")
public class LoginServlet extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public LoginServlet() {
        super();
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		//response.getWriter().append("Served at: ").append(request.getContextPath());
		
		response.setContentType("text/html");
		PrintWriter out = response.getWriter(); 
		String msg = request.getParameter("msg");
		
		//Prints login form in the website's style
		out.println("<html>" +
					"   <head>" +
					"		<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css' />" +
					"		<link rel='stylesheet' href='http://localhost/StoryShare-Project5/styles/main.css' />" +
					"   </head>" +
                    	"   <body>" +
					"		<script src='http://localhost/StoryShare-Project5/navbar.php' type='text/javascript'></script>" +
                    "		<h2>Login</h2>" +
                    "		<section class='new_post'>");
		
		//Prints out existing messages passed as parameter from SessionServlet
		if (msg != null) {
			out.println(msg + "<br />");
		}
		
		//Prints the login form with the post to the SessionServlet.java
		out.println("      		<form action='http://localhost:8080/StoryShare_Servlet/SessionServlet' method='post'>" +                    
                    "         		Username: <input type='text' name='servlet_username'><br>" +
                    "        		 Password: <input type=\"text\" name=\"servlet_password\"><br>" +
                    "         		<input type='submit' value='Login'>" + 
                    "			</form>" +
                    "		</section>" +
                    "		<script src='http://localhost/StoryShare-Project5/footer.js'></script>" +	
                    "	</body>" +
                    "</html>" ); 

	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		doGet(request, response);
	}

}