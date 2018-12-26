package br.com.victorblq.application.configuration;

import org.springframework.context.annotation.Configuration;
import org.springframework.security.config.annotation.web.builders.HttpSecurity;
import org.springframework.security.config.annotation.web.configuration.WebSecurityConfigurerAdapter;

/**
 * 
 * @author Victor Carvalho
 *
 * @version 1.0.0
 * @since 1.0.0, 12/19/2018
 */
@Configuration
public class WebSecurityConfiguration extends WebSecurityConfigurerAdapter {
	
	@Override
    protected void configure(HttpSecurity httpSecurity) throws Exception {
    	
        httpSecurity.csrf().disable();
        httpSecurity.headers().frameOptions().disable();
        
        httpSecurity
        	.authorizeRequests().antMatchers("/**").permitAll() 
				.anyRequest() 
					.authenticated() 
				.and() 
					.formLogin() 
				        .usernameParameter("email") 
				        .passwordParameter("password")
				        .loginPage("/authentication") 
				        .loginProcessingUrl("/authenticate") 
//				        .failureHandler(this.authenticationFailureHandler) 
//				        .successHandler(this.authenticationSuccessHandler) 
			        .permitAll() 
		        .and() 
		        	.logout() 
		        		.logoutUrl("/logout");
//		        		.logoutSuccessHandler(new HttpStatusReturningLogoutSuccessHandler()); 
    }
}
