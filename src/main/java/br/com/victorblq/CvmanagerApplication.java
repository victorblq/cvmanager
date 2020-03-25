package br.com.victorblq;

import java.nio.file.Path;
import java.nio.file.Paths;

import javax.annotation.Resource;

import org.springframework.beans.factory.annotation.Value;
import org.springframework.boot.CommandLineRunner;
import org.springframework.boot.SpringApplication;
import org.springframework.boot.autoconfigure.SpringBootApplication;
import org.springframework.boot.builder.SpringApplicationBuilder;
import org.springframework.boot.web.servlet.support.SpringBootServletInitializer;
import org.springframework.context.annotation.PropertySource;

import br.com.victorblq.domain.service.UploadService;

/**
 * 
 * @author Victor Carvalho
 *
 * @version 1.0.0
 * @since 1.0.0, 12/19/2018
 */
@SpringBootApplication
@PropertySource("classpath:/config/application.yml")
public class CvmanagerApplication extends SpringBootServletInitializer implements CommandLineRunner{
	
	@Value("${upload.paths.image}")
	private String imageUploadPath;
	
	@Value("${upload.paths.projectsImages}")
	private String projectsImagesPath;
	
	@Resource
	UploadService uploadService;

	public static void main(String[] args) {
		SpringApplication.run(CvmanagerApplication.class, args);
	}

	@Override
	public void run(String... args) throws Exception {
		Path imgPath = Paths.get(this.imageUploadPath);
		this.uploadService.initImageDir(imgPath);
		
		Path projectsImagesPath = Paths.get(this.projectsImagesPath);
		this.uploadService.initImageDir(projectsImagesPath);
	}

	@Override
	protected SpringApplicationBuilder configure(SpringApplicationBuilder application) {
		return application.sources(CvmanagerApplication.class);
	}
	

}
