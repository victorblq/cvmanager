package br.com.victorblq.domain.controller;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.security.crypto.password.PasswordEncoder;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;

/**
 * 
 * @author victor.blosquievis
 *
 * @version 1.0.0
 * @since 1.0.0, 12/19/2018
 */
@Controller
public class HomeController {
	
	@Autowired
	PasswordEncoder passwordEncoder;
	
	@GetMapping("/")
	public String home() {
		return "index";
	}
	
	@GetMapping("/encrypt")
	public void encrypt() {
		
		System.out.println(this.passwordEncoder.encode("admin"));
	}
}
