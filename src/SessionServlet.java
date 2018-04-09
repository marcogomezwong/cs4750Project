
import java.io.IOException;
import javax.servlet.ServletException;
import javax.servlet.annotation.WebServlet;
import javax.servlet.http.HttpServlet;
import javax.servlet.http.HttpServletRequest;
import javax.servlet.http.HttpServletResponse;
import javax.servlet.http.HttpSession;

import java.io.PrintWriter;
/**
 * Servlet implementation class SessionServlet
 */
@WebServlet("/SessionServlet")
public class SessionServlet extends HttpServlet {
	private static final long serialVersionUID = 1L;
       
    /**
     * @see HttpServlet#HttpServlet()
     */
    public SessionServlet() {
        super();
    }

	/**
	 * @see HttpServlet#doGet(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doGet(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {
		response.getWriter().append("Served at: ").append(request.getContextPath());
	}

	/**
	 * @see HttpServlet#doPost(HttpServletRequest request, HttpServletResponse response)
	 */
	protected void doPost(HttpServletRequest request, HttpServletResponse response) throws ServletException, IOException {

		 response.setContentType("text/html");
	      PrintWriter out = response.getWriter();
	      
	      String username = request.getParameter("servlet_username");
	      String password = request.getParameter("servlet_password");
	      
	      //Check that the fields in the login form are fileld out
	      if (username.length() > 0 && password.length() > 0)
	      {    	 	 
	         
	    	  	//In the future, we will check with the passwords in the database
	         HttpSession session = request.getSession();
	         session.setAttribute("username", request.getParameter("servlet_username"));
	         String url = "http://localhost/StoryShare-Project5/index.php?username=" + session.getAttribute("username");				

	         response.sendRedirect(url);
	         
	         //Used to to check that session is stored.
	         //out.println("<br/><br/><a href=\"servletSession\">See the session information</a>");

	      }
	      else
	      {
	    	  	//Redirects to login screen with message
	         String msg = "Please enter both fields.";
	         String url = "http://localhost:8080/StoryShare_Servlet/LoginServlet?msg= "+ msg;
	         response.sendRedirect(url);
	      }
	      
	      out.close();
	}
	

}