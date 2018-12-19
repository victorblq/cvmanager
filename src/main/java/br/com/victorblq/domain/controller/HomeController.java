package br.com.victorblq.domain.controller;

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
	
	@GetMapping("/")
	public String home() {
		return "teste";
	}
}
