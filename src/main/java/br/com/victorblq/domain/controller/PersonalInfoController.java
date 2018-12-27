package br.com.victorblq.domain.controller;

import java.nio.file.Paths;

import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.beans.factory.annotation.Value;
import org.springframework.web.bind.annotation.DeleteMapping;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestParam;
import org.springframework.web.bind.annotation.RestController;
import org.springframework.web.multipart.MultipartFile;

import br.com.victorblq.domain.entity.personal_info.Email;
import br.com.victorblq.domain.entity.personal_info.PersonalInfo;
import br.com.victorblq.domain.entity.personal_info.Phone;
import br.com.victorblq.domain.entity.personal_info.Reference;
import br.com.victorblq.domain.service.PersonalInfoService;
import br.com.victorblq.domain.service.UploadService;

/**
 * 
 * @author Victor Carvalho
 *
 * @version 1.0.0
 * @since 1.0.0, 12/26/2018
 */
@RestController
@RequestMapping(value = "/personal_info")
public class PersonalInfoController {
	
	@Value("${upload.paths.image}")
	private String imageUploadPath;
	
	@Autowired
	private PersonalInfoService personalInfoService;
	@Autowired
	private UploadService uploadService;
	
	@GetMapping
	public PersonalInfo getPersonalInfo() {
		return this.personalInfoService.getPersonalInfo();
	}
	
	@PutMapping
	public PersonalInfo updatePersonalInfo(@RequestBody PersonalInfo personalInfo) {
		return this.personalInfoService.updatePersonalInfo(personalInfo);
	}
	
	/**
	 * Phone
	 */
	@PostMapping("/phone")
	public PersonalInfo addPhone(@RequestBody Phone phone) {
		return this.personalInfoService.addPhone(phone);
	}

	@DeleteMapping("/phone/{phoneId}")
	public void removePhone(@PathVariable("phoneId") Long phoneId) {
		this.personalInfoService.removePhone(phoneId);
	}
	
	/**
	 * Email
	 */
	@PostMapping("/email")
	public PersonalInfo addEmail(@RequestBody Email email) {
		return this.personalInfoService.addEmail(email);
	}

	@DeleteMapping("/email/{emailId}")
	public void removeEmail(@PathVariable("emailId") Long emailId) {
		this.personalInfoService.removeEmail(emailId);
	}

	/**
	 * Reference
	 */
	@PostMapping("/reference")
	public PersonalInfo addReference(@RequestBody Reference reference) {
		return this.personalInfoService.addReference(reference);
	}
	
	@DeleteMapping("/reference/{referenceId}")
	public void removeReference(@PathVariable("referenceId") Long referenceId) {
		this.personalInfoService.removeReference(referenceId);
	}
	
	/**
	 * Image
	 */
	@PutMapping("/image")
	public PersonalInfo updateImage(@RequestParam("image") MultipartFile image) {
		final String imageName = this.uploadService.store(image, Paths.get(this.imageUploadPath));
		
		return this.personalInfoService.updateImage(imageName);
	}
}