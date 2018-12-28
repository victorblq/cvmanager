/**
 * 
 */
package br.com.victorblq.domain.controller;

import java.util.List;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RestController;

import br.com.victorblq.domain.entity.graduation.Graduation;
import br.com.victorblq.domain.entity.graduation.GraduationStatus;
import br.com.victorblq.domain.service.GraduationService;

/**
 * 
 * @author Victor Carvalho
 *
 * @version 1.0.0
 * @since 1.0.0, Dec 28, 2018
 */
@RestController
@RequestMapping(value = "/graduation")
public class GraduationController {
	
	@Autowired
	GraduationService graduationService;
	
	@GetMapping
	public List<Graduation> listGraduations(){
		return this.graduationService.listGraduations();
	}
	
	@PostMapping
	public Graduation insertGraduation(@RequestBody Graduation graduation) {
		return this.graduationService.insertGraduation(graduation);
	}
	
	@GetMapping("/graduation_status")
	public GraduationStatus[] listGraduationStatus() {
		return GraduationStatus.values();
	}
}
